from fastapi import FastAPI
from pydantic import BaseModel
import routes.carRoutes as api
import uvicorn

app = FastAPI()
app.include_router(api.router)

@app.get('/')
def home():
    return {"Message" : "Welcome to my first fastAPI app !"}