import { Component, Input, OnInit, Output, EventEmitter } from '@angular/core';
​
@Component({
  selector: 'app-car',
  templateUrl: './car.component.html',
  styleUrls: [
    '../../../../node_modules/bootstrap/dist/css/bootstrap.min.css',
    './car.component.css'
]
})
export class CarComponent implements OnInit {
  constructor() {}
  ngOnInit(): void {}

  @Output() car_detail = new EventEmitter<{mark: string, status: string}>();​
  throwCarDetail(car) {
    this.car_detail.emit(car);
  }

  @Input() aCar:{mark:string, status:string};

  //!Switch car's state
  demarrerArreter() {
    if(this.aCar.status == "Démarrée") {
      this.aCar.status = "Arrêtée";
    } else if(this.aCar.status == "Arrêtée") {
      this.aCar.status = "Démarrée";
    }
  }
}
