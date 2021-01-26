import { Component, EventEmitter, OnInit, Output } from '@angular/core';

import { CarService } from '../../common/voiture.service';
​
@Component({
  selector: 'app-add-car',
  templateUrl: './car.add.component.html',
  styleUrls: ['../../../../node_modules/bootstrap/dist/css/bootstrap.min.css']
})
export class AddCarComponent implements OnInit {
  @Output() addCarEventEmiter = new EventEmitter<{mark:string, status:string}>();

  inputValue:string = '';

  constructor(private carsService:CarService) {}

  ngOnInit(): void {}
  ​
  // onAddVoiture(){
  //   this.addVoitureEventEmitter.emit({marque: this.inputValue, status: "Arrêtée"});
  // }

  //! Add car
  //* (WHITHOUT SERVICE) -> ​@Output() addCarEventEmitter = new EventEmitter<{mark: string, status: string}>();
  onAddVoiture2(value:string) {
    //* (WHITHOUT SERVICE) -> this.addCarEventEmitter.emit({mark: value, status: "Arrêtée"});
    this.carsService.addCar({mark: value, status: false});
  }
​
  //! Get input value
  onKeyUp(event:Event) {
    this.inputValue = (<HTMLInputElement>event.target).value;
  }
}
