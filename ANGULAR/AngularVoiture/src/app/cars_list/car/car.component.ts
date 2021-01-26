import { Component, Input, OnInit, Output, EventEmitter } from '@angular/core';

import { CarService } from '../../common/voiture.service';
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
  constructor(private CarService:CarService) {}
  ngOnInit(): void {}

  @Input() aCar:{mark:string, status:boolean};

  //!Emmit car details
  @Output() car = new EventEmitter<{mark: string, status: boolean}>();​
  throwCarDetail(mark:string) {
    this.CarService.emmitCarSelected(mark);
  }

  //! Switch car's state
  OnOff() {
    if(this.aCar.status) {
      this.aCar.status = false;
    } else if(!this.aCar.status) {
      this.aCar.status = true;
    }
  }
}
