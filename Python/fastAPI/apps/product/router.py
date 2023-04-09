from typing import Optional
from fastapi import APIRouter

router : APIRouter = APIRouter()
@router.get("/")
def read_root():
    return {"Hello": "World"}
