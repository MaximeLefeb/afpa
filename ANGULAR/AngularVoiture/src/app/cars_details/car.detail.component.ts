import { Input, Component, OnInit} from "@angular/core";

import { CarService } from '../common/voiture.service';

@Component({
  selector: "app-car-detail",
  templateUrl: "./car.detail.component.html",
  styleUrls: ['../../../node_modules/bootstrap/dist/css/bootstrap.min.css']
})
export class CarDetailComponent implements OnInit {

  car:{mark:string, status:boolean};

  constructor(private serviceCar:CarService) {
    this.serviceCar.selectCar.subscribe(mark => {
      this.car = this.serviceCar.getDetailCar(mark);
    })
  }

  ngOnInit():void {}
}
