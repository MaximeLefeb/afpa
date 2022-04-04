from sqlalchemy.schema import Column
from sqlalchemy.types import String, Integer, Enum
from database.db import Base
import enum

class FuelType(str, enum.Enum):
    petrol = "Essence"
    diesel = "Diesel"
    
class CarModel(Base):
    __tablename__ = "car"
    
    id = Column(Integer, primary_key=True, index=True)
    manufacturer = Column(String)
    modelName = Column(String)
    cc = Column(Integer)
    price = Column(Integer)
    FuelType = Column(Enum(FuelType))
    