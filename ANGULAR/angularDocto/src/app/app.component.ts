import { Component, OnInit } from '@angular/core';
import { AppService } from './app.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: [
    '../../node_modules/bootstrap/dist/css/bootstrap.min.css',
    './app.component.css'
  ]
})
export class AppComponent implements OnInit {
  title = 'Doctolib - Acceuil';

  constructor(private appService:AppService) {}

  ngOnInit(){}
}
