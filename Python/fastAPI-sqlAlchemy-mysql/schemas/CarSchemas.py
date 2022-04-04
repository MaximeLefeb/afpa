from pydantic import BaseModel
from models.CarModel import FuelType
from typing import List

class CreateAndUpdateCar(BaseModel):
    manufacturer :str
    modelName :str
    cc :int
    price :int
    FuelType :FuelType
    
class Car(CreateAndUpdateCar):
    id: int
    
    class Config:
        orm_mode = True

class PaginatedCarModel(BaseModel):
    limit: int
    offset: int
    data: List[Car]