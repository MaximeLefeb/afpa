import { Injectable, EventEmitter } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class CarService {
  cars: {mark: string, status: boolean}[] = [
    {
      mark: "AUDI",
      status: false
    },
    {
      mark: "MERCEDES",
      status: false
    },
    {
      mark: "FORD",
      status: false
    }
  ];

  selectCar = new EventEmitter<string>();

  getAllCars() {
    return this.cars;
  }

  addCar(car:{mark:string, status:boolean}) {
    this.cars.push(car)
  }

  //! Emmit
  emmitCarSelected(mark:string) {
    this.selectCar.emit(mark);
  }

  getDetailCar(mark) {
    for(const car of this.cars) {
      if (mark.mark === car.mark) {
        return car;
      }
    }
  }
}
