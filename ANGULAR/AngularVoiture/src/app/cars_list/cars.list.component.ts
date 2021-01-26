import { Component, Input, EventEmitter, Output } from "@angular/core";

import { CarService } from '../common/voiture.service';
​
@Component({
  selector: "app-cars-list",
  templateUrl: "./cars.list.component.html",
  styleUrls: ['../../../node_modules/bootstrap/dist/css/bootstrap.min.css']
})
export class CarsListComponent {
  public cars:{mark:string, status:boolean}[] = [];

  constructor(private carsService:CarService) {
    this.cars = this.carsService.getAllCars();
  }

  /* addReceivedCar(car: {mark: string, status: string}){
    this.cars.push(car);
  } */

  ngOnInit():void {}

  //! Emmit car detail
  @Output() selectCar = new EventEmitter<{mark: string, status: boolean}>();
  /* throwCarDetail(car:{mark:string, status:string}) {
    this.car_detail.emit(car);
  } */
}

