//* MODULES
import { NgModule } from '@angular/core';
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

//* SERVICES
import { AppService } from './app.service';
import { RdvService } from './service/Rdv.service';
import { PatientService } from './service/Patient.service';
import { PraticienService } from './service/Praticien.service';

@NgModule({
  declarations: [
    AppComponent,
    IndexComponent,
    SearchBarComponent,
    RdvsComponent,
    searchResultComponent,
    PraticiensComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
    NgxSpinnerModule,
    BrowserAnimationsModule
  ],
  providers: [
    PraticienService,
    PatientService,
    RdvService,
    AppService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
