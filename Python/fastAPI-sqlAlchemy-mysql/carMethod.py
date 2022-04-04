from sqlalchemy.orm import Session
from models.CarModel import CarModel
from schemas.CarSchemas import CreateAndUpdateCar
from errors.exceptions import CarModelAlreadyExistError, CarModelNotFoundError
from sqlalchemy.exc import SQLAlchemyError

def get(session: Session, limit: int, offset: int):
    return session.query(CarModel).offset(offset).limit(limit).all();

def get_by_id(session: Session, _id: int):
    car_info = session.query(CarModel).get(_id)
    
    if car_info is None:
        raise CarModelNotFoundError
    
    return car_info

def post(session: Session, car_info: CreateAndUpdateCar):
    car_details = session.query(CarModel).filter(CarModel.manufacturer == car_info.manufacturer, CarModel.modelName == car_info.modelName).first()

    if car_details is not None: 
        raise CarModelAlreadyExistError
    
    car = CarModel(**car_info.dict())
    session.add(car)
    session.commit()
    session.refresh(car)
    
    return car

def put(session: Session, _id: int, to_put: CreateAndUpdateCar):
    car_info = get_by_id(session, _id)
    
    if car_info is None:
        raise CarModelNotFoundError
    
    car_info.manufacturer = to_put.manufacturer
    car_info.modelName    = to_put.modelName
    car_info.cc           = to_put.cc
    car_info.price        = to_put.price
    car_info.fuelType     = to_put.FuelType
    
    session.commit()
    session.refresh(car_info)
    
    return car_info

def delete(session: Session, _id: int):
    car_info = get_by_id(session, _id)
    
    if car_info is None:
        raise CarModelNotFoundError
    
    session.delete(car_info)
    session.commit()
    
    return