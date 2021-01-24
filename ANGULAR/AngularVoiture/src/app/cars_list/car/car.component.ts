import { Component, Input, OnInit, Output, EventEmitter } from '@angular/core';
​
@Component({
  selector: 'app-car',
  templateUrl: './car.component.html',
  styleUrls: ['../../../../node_modules/bootstrap/dist/css/bootstrap.min.css']
})
export class CarComponent implements OnInit {
  constructor() {}
  ngOnInit(): void {}
  ​
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
