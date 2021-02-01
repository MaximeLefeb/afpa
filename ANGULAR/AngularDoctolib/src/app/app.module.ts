import { AppRoutingModule } from './app.routes';
//* MODULES
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule } from '@angular/router';

//* COMPONENTS
import { AppComponent } from './app.component';
import { IndexComponent } from './components/index/index.component';

//* SERVICES
import { PraticienService } from './service/Praticien.service';
import { PatientService } from './service/Patient.service';
import { RdvService } from './service/Rdv.service';

@NgModule({
  declarations: [
    AppComponent,
    IndexComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule
  ],
  providers: [
    PraticienService,
    PatientService,
    RdvService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
