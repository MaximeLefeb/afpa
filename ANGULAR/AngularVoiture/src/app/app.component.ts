import { Component, ViewChild } from '@angular/core';
import { NgForm } from '@angular/forms';
import { interval } from 'rxjs';
import { take, map, filter } from 'rxjs/operators';

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
  mail:string;
  pwd:string;

  //@ViewChild('registerForm') myForm:NgForm;
  constructor() {
    /*
    const number = interval(100).pipe(
      take(25),
      map(x => x*2),
      filter(x => x > 20)
    );
    number.subscribe(x => console.log(x));
    */
  }

  //! CARS BLOCK
  selectedCar:{mark:string, status:boolean};

  onReceivedCar(car:{mark:string, status:boolean}) {
    this.selectedCar = car;
  }

  //! FORM BLOCK
  register(form:NgForm) {
    console.log(form);
    console.log(this.mail + " : " + this.pwd)
  }
}
