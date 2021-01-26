import { Component, Output } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: [
    './app.component.css',
    '../../node_modules/bootstrap/dist/css/bootstrap.min.css'
  ]
})
export class AppComponent {
  title = "car App";

  selectedCar:{mark:string, status:boolean};

  onReceivedCar(car:{mark:string, status:boolean}) {
    this.selectedCar = car;
  }
}
