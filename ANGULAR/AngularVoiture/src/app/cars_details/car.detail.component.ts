import { Input } from "@angular/core";
import { Component } from "@angular/core";

@Component({
  selector: "app-car-detail",
  templateUrl: "./car.detail.component.html",
  styleUrls: ['../../../node_modules/bootstrap/dist/css/bootstrap.min.css']
})
export class CarDetailComponent {
  @Input() detail:{mark:string, status:string};
}
