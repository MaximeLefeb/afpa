import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';

//* SERVICE
import { PraticienService } from './service/Praticien.service';
import { PatientService } from './service/Patient.service';
import { RdvService } from './service/Rdv.service';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule
  ],
  providers: [
    PraticienService,
    PatientService,
    RdvService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
