//* MODULES
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { NgxSpinnerModule } from 'ngx-spinner';
import { AppRoutingModule } from './app.routes';
import { HttpClientModule } from '@angular/common/http';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

//* COMPONENTS
import { AppComponent } from './app.component';
import { RdvsComponent } from './components/rdvs/rdvs.component';
import { IndexComponent } from './components/index/index.component';
import { PraticiensComponent } from './components/praticiens/praticiens.component';
import { SearchBarComponent } from './components/index/searchBar/searchbar.component';
import { searchResultComponent } from './components/searchResult/searchResult.component';
import { RegisterPatientComponent } from './components/patients/form/registerPatient.component';
import { RegisterPraticienComponent } from './components/praticiens/form/registerPraticien.component';

//* SERVICES
import { AppService } from './app.service';
import { RdvService } from './service/Rdv.service';
import { PatientService } from './service/Patient.service';
import { PraticienService } from './service/Praticien.service';

@NgModule({
  declarations: [
    AppComponent,
    RdvsComponent,
    IndexComponent,
    SearchBarComponent,
    PraticiensComponent,
    searchResultComponent,
    RegisterPatientComponent,
    RegisterPraticienComponent
  ],
  imports: [
    FormsModule,
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
    NgxSpinnerModule,
    BrowserAnimationsModule,
  ],
  providers: [
    RdvService,
    AppService,
    PatientService,
    PraticienService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule {}
