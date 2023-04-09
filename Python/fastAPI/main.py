from typing import Optional
from fastapi import FastAPI

#* Routes 
from apps.user.router import router as  userRoute
from apps.product.router import router as productRoute

app = FastAPI()
API_VERSION = "v0.1"

@app.get("/")
def read_root():
    return {"Hello": "World"}

@app.get("/items/{item_id}")
def read_item(item_id: int, q: Optional[str] = None):
    return {"item_id": item_id, "q": q}

app.include_router(userRoute, tags=["User"], prefix=f"/api/{API_VERSION}/user")