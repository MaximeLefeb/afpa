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
  title = 'AngularVoiture';

  detail:{mark:string, status:string} = {
    mark:"none selected",
    status:"none selected"
  };

  getCarDetail(event) {
    this.detail = event;
  }
}
