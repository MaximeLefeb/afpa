class CarModelException(Exception):
    ...
    
class CarModelNotFoundError(CarModelException):
    def __init__(self):
        self.status_code = 404
        self.detail = "Car Not Found"
        
class CarModelAlreadyExistError(CarModelException):
    def __init__(self):
        self.status_code = 409
        self.detail = "Car Already Exist"