from database.db import get_db
from fastapi_utils.cbv import cbv
from sqlalchemy.orm import Session
from errors.exceptions import CarModelException
from fastapi import APIRouter, Depends, HTTPException
from carMethod import get, post, get_by_id, put, delete
from schemas.CarSchemas import Car, CreateAndUpdateCar, PaginatedCarModel
from sqlalchemy.exc import SQLAlchemyError

router = APIRouter()

@cbv(router)
class Cars:
    session : Session = Depends(get_db)

    @router.get('/cars', response_model=PaginatedCarModel)
    def cars(self, limit:int = 10, offset:int = 0):
        cars = get(self.session, limit, offset)
        
        return {
            "limit" : limit,
            "offset": offset,
            "data"  : cars
        }
    
    @router.post('/cars')
    def add(self, car_info:CreateAndUpdateCar):
        try:
            return post(self.session, car_info)
        except CarModelException as cie:
            raise HTTPException(**cie.__dict__)
    
    @router.get('/cars/{id}', response_model=Car)
    def get_by_id(id:int, session:Session = Depends(get_db)):
        try:
            return get_by_id(session, id)
        except CarModelException as cie:
            raise HTTPException(**cie.__dict__)
    
    @router.put('/cars/{id}')
    def update(id:int, to_put: CreateAndUpdateCar, session:Session = Depends(get_db)):
        try:
            return put(session, id, to_put)
        except CarModelException as cie:
            raise HTTPException(**cie.__dict__)
    
    @router.delete("/cars/{id}")
    def delete_car(id: int, session: Session = Depends(get_db)):
        try:
            return delete(session, id)
        except CarModelException as cie:
            raise HTTPException(**cie.__dict__)