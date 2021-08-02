from typing import Text
from fastapi import FastAPI, Path, Query, HTTPException, status
from typing import Optional
from fastapi.param_functions import Query
from pydantic import BaseModel
# from models.Employe import Employe 

users = {
    1 : {
        "firstname" : "Lefebvre",
        "name" : "Maxime"
    },
    2 : {
        "firstname" : "Gateau",
        "name" : "Enzo"
    },
    3 : {
        "firstname" : "Gateau",
        "name" : "Enzo"
    }
}

class Employe(BaseModel):
    firstname: str
    name: str

class UpdateEmploye():
    firstname: Optional[str] = None
    name: Optional[str] = None

app = FastAPI()

@app.get("/")
async def root():
    return {"message": "Hello World"}

#* Path is the description of the parameters : None is the default value of the parameters, gt = greatter than
@app.get("/user/{id}")
async def getUsers(id: int = Path(None, description = "The id of the user you want to get", gt = 0)):
    return users[id]

#* Get multiple parameters
#* 127.0.0.1:8000/user?id=1&name=Lefebvre
# @app.get("/user/{id}/{name}")
# async def getUsers(id:int, name:string):
#     return users[id]

#* Parameters * is usefull for avoid parameters order, if the first parameters is not required and the second is required
#* Place a *, in first argument or set the non-require parameters after the required one
@app.get("/get-by-name/{item_id}")
async def getItem(*, item_id:int, name: Optional[str] = None, test:int):
    for item_id in users:
        if users[item_id].name == name:
            return users[item_id]
    raise HTTPException(status_code = status.HTTP_404_NOT_FOUND, detail="Item not found")

@app.post("/add-user/{item_id}")
async def addUser(item_id:int, item: Employe):
    if item_id in users:
        return {"error" : "item already exist"}

    users[item_id] = {"firstname" : item.firstname, "name" : item.name}
    return users[item_id]

@app.put("/update-user/{item_id}")
async def updateUser(item_id:int, item: UpdateEmploye):
    if item_id not in users:
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND, detail="Item not found")

    if item.name != None:
        users[item_id].name = item.name

    if item.firstname != None:
        users[item_id].firstname = item.firstname

    return users[item_id]
    
@app.delete("/deleteItem/{item_id}")
async def delete(item_id:int = Query(..., description="Id of the user you want to delete")):
    if item_id not in users:
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND, detail="Item not found")

    del users[item_id]

    return {"success" : "item deleted"}