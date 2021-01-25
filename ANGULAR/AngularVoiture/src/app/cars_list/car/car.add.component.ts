import { Component, EventEmitter, OnInit, Output } from '@angular/core';
​
@Component({
  selector: 'app-add-car',
  templateUrl: './car.add.component.html',
  styleUrls: ['../../../../node_modules/bootstrap/dist/css/bootstrap.min.css']
})
export class AddCarComponent implements OnInit {
​
  @Output() addCarEventEmitter = new EventEmitter<{mark: string, status: string}>();
​
  inputValue:string = '';

  constructor() {}

  ngOnInit(): void {}
​
  // onAddVoiture(){
  //   this.addVoitureEventEmitter.emit({marque: this.inputValue, status: "Arrêtée"});
  // }
​
  // Utilisée avec la variable locale #monInput (dans le template)
  onAddVoiture2(value:string) {
    this.addCarEventEmitter.emit({mark: value, status: "Arrêtée"});
  }
​
  onKeyUp(event:Event) {
    this.inputValue = (<HTMLInputElement>event.target).value;
  }
}
