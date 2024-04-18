
import time

from moviepy.editor import VideoFileClip
from collections import deque
import numpy as np
import cv2
from datetime import datetime
import pytz
import telepot
from keras.models import load_model
from fastapi import FastAPI, File, UploadFile, HTTPException, APIRouter, Request
from fastapi.templating import Jinja2Templates
from fastapi.responses import FileResponse
from fastapi.staticfiles import StaticFiles
from fastapi.middleware.cors import CORSMiddleware
from tempfile import NamedTemporaryFile
from fastapi.responses import FileResponse, StreamingResponse, HTMLResponse
from fastapi import Path
import smtplib
from email.mime.text import MIMEText
import pytz
from datetime import datetime

def getTime():
  IST = pytz.timezone("Asia/Karachi")
  timeNow = datetime.now(IST)
  return timeNow
timeMoment = getTime()
location="Comsats University Islamabad, Attock Campus"
filename = 'savedImage.jpg'
body2=( f"VIOLENCE ALERT!! \nLOCATION: {location} \nDATE & TIME: {timeMoment}")
# pic=photo(open(filename, 'rb'))

subject = "VIOLENCE ALERT!!"
body =body2
sender = "usmannawar123@gmail.com"
recipients = ["ahmed258bilal@gmail.com", "Uk4210770@gmail.com"]
password = "vxyb vpmj qvpq ezgz"


def send_email(subject, body, sender, recipients, password):
    msg = MIMEText(body)
    msg['Subject'] = subject
    msg['From'] = sender
    msg['To'] = ', '.join(recipients)
    with smtplib.SMTP_SSL('smtp.gmail.com', 465) as smtp_server:
       smtp_server.login(sender, password)
       smtp_server.sendmail(sender, recipients, msg.as_string())
    print("Message sent!")






def convert_to_mp4(input_path):

    current_datetime = datetime.now().strftime("%Y%m%d_%H%M%S")
    output_path = f"output/output_video_{current_datetime}.mp4"
    # Load the video clip
    clip = VideoFileClip(input_path)

    # Write the clip to an MP4 file with H.264 codec and AAC audio codec
    clip.write_videofile(output_path, codec="libx264", audio_codec="aac")

    return output_path

def print_results(video, limit=None):
    trueCount = 0
    imageSaved = 0
    filename = 'savedImage.jpg'
    finalImage = 'finalImage.jpg'
    sendAlert = 0

    output_path = ""
    print("Loading model ...")
    model = load_model('violance.h5')
    Q = deque(maxlen=128)
    vs = cv2.VideoCapture(video)
    writer = None
    (W, H) = (None, None)
    count = 0
    try:
        while True:
            (grabbed, frame) = vs.read()
            if not grabbed:
                break
            if W is None or H is None:
                (H, W) = frame.shape[:2]

            output = frame.copy()
            frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
            frame = cv2.resize(frame, (128, 128)).astype("float32")
            frame = frame.reshape(128, 128, 3) / 255
            preds = model.predict(np.expand_dims(frame, axis=0))[0]
            Q.append(preds)
            results = np.array(Q).mean(axis=0)
            i = (preds > 0.50)[0]
            label = i

            text_color = (0, 255, 0)  # default: green

            if label:  # Violence prob
                text_color = (0, 0, 255)  # red
                trueCount += 1

            else:
                text_color = (0, 255, 0)

            text = "Violence: {}".format(label)
            FONT = cv2.FONT_HERSHEY_SIMPLEX

            cv2.putText(output, text, (35, 50), FONT, 1.25, text_color, 3)

            # check if the video writer is Noneq
            if writer is None:
                # initialize our video writer
                # fourcc = cv2.VideoWriter_fourcc(*"XVID")
                fourcc = cv2.VideoWriter_fourcc("M", "P", "4", "V")
                output_path = "output/video.mp4"
                writer = cv2.VideoWriter(output_path, fourcc, 30, (W, H), True)
                # writer = cv2.VideoWriter("recordedVideo.avi", fourcc, 30, (W, H), True)

            # write the output frame to disk
            writer.write(output)

            if trueCount == 50:
                if imageSaved == 0:
                    if label:
                        cv2.imwrite(f"output/{filename}", output)
                        imageSaved = 1

                if sendAlert == 0:
                    send_email(subject, body, sender, recipients, password)
                    endAlert = 1

            key = cv2.waitKey(1) & 0xFF

            # if the `q` key was pressed, break from the loop
            if key == ord("q"):
                break
    finally:
        # release the file pointers
        print("[INFO] cleaning up...")
        vs.release()
        time.sleep(2)
        if writer:
            writer.release()
        path = convert_to_mp4(output_path)
        return path

# # Example usage
# V_path = "videos/video1.mp4"
# NV_path = "output/nonv.mp4"
# print_results(V_path)



router = APIRouter()
templates = Jinja2Templates(directory="templates")
@router.get("/", response_class=HTMLResponse)
async def read_root(request: Request):
    return templates.TemplateResponse("upload.html", {"request": request})


@router.post("/uploadfile/")
async def create_upload_file(req: Request):
    data = await req.json()

    # Convert the list to bytes
    video_bytes = bytes(data['video'])

    with NamedTemporaryFile(delete=False, suffix=".mp4") as tmp_file:
        tmp_path = tmp_file.name
        tmp_file.write(video_bytes)

    processed_video_path = print_results(tmp_path)
    return {"video_path": f"voilence//{processed_video_path}"}

@router.get("/download/{file_path:path}")
async def download_file(file_path: str):
    return FileResponse(file_path, filename=file_path.split("/")[-1])

@router.get("/play/{file_path:path}")
async def play_video(file_path: str):
#     return FileResponse(file_path, media_type="video/mp4")

        async def video_stream():
            CHUNK_SIZE = 1024 * 1024
            with open(file_path, "rb") as video:
                while True:
                    chunk = video.read(CHUNK_SIZE)
                    if not chunk:
                        break
                    yield chunk

        return StreamingResponse(video_stream(), media_type="video/mp4")