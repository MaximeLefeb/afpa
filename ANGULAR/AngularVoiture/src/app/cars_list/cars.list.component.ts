import { Component, Input, EventEmitter, Output } from "@angular/core";
​
@Component({
  selector: "app-cars-list",
  templateUrl: "./cars.list.component.html",
  styleUrls: ['../../../node_modules/bootstrap/dist/css/bootstrap.min.css']
})
export class CarsListComponent {
  cars: {mark: string, status: string}[] = [
    {
      mark: "AUDI",
      status: "Démarrée"
    },
    {
      mark: "MERCEDES",
      status: "Arrêtée"
    },
    {
      mark: "FORD",
      status: "Démarrée"
    }
  ];

  addReceivedCar(car: {mark: string, status: string}){
    this.cars.push(car)
  }

  //! Get car detail
  @Output() car_detail = new EventEmitter<{mark: string, status: string}>();
  throwCarDetail(car) {
    this.car_detail.emit(car);
  }
}

