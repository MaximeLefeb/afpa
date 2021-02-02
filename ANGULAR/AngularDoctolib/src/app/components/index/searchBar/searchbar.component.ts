import { AppService } from './../../../app.service';
import { Component } from "@angular/core";

@Component({
  selector: 'app-searchbar',
  templateUrl: './searchbar.component.html',
  styleUrls: [
    './searchbar.component.css'
  ]
})
export class SearchBarComponent {

  constructor(private AppService:AppService) {}

  //* Get content of searchbar
  inputValue:string = '';
  onKeyUp(event:Event) {
    this.inputValue = (<HTMLInputElement>event.target).value;
  }
}
