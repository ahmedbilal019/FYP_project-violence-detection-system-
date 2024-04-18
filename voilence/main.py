import os
from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from fastapi.staticfiles import StaticFiles
from voilence_detection import router
from fastapi.templating import Jinja2Templates
import uvicorn

app = FastAPI(
    max_upload_size=100 * 1024 * 1024
)
# app.include_router(router)
templates = Jinja2Templates(directory="templates")
origins = ["*"]
laptop_ip = "127.0.0.1"

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins  + [f"http://{laptop_ip}"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

app.include_router(router, prefix="/api", tags=["modules"])
# Mount the 'output' folder to serve static files (downloaded videos)
app.mount("/output", StaticFiles(directory="output"), name="output")



# Run the server
if __name__ == "__main__":
    uvicorn.run(app, host="127.0.0.1")