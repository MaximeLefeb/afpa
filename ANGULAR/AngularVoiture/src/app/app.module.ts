import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { CarsListComponent } from './cars_list/cars.list.component';
import { CarComponent } from './cars_list/car/car.component';
import { AddCarComponent } from './cars_list/car/car.add.component';
import { CarDetailComponent } from './cars_details/car.detail.component';
import { CarService } from './common/voiture.service';

@NgModule({
  declarations: [
    AppComponent,
    CarsListComponent,
    CarComponent,
    AddCarComponent,
    CarDetailComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [CarService],
  bootstrap: [AppComponent]
})
export class AppModule { }
