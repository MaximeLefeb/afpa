//* MODULES
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { NgxSpinnerModule } from 'ngx-spinner';
import { AppRoutingModule } from './app.routes';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

//* COMPONENTS
import { AppComponent } from './app.component';
import { RdvsComponent } from './components/rdvs/rdvs.component';
import { IndexComponent } from './components/index/index.component';
import { LoginComponent } from './components/login/login.component';
import { AlertsComponent } from './components/alerts/alerts.component';
import { MyAccountComponent } from './components/myAccount/MyAccount.component';
import { PraticiensComponent } from './components/praticiens/praticiens.component';
import { SearchBarComponent } from './components/index/searchBar/searchbar.component';
import { searchResultComponent } from './components/searchResult/searchResult.component';
import { RegisterPatientComponent } from './components/patients/form/registerPatient.component';
import { RegisterPraticienComponent } from './components/praticiens/form/registerPraticien.component';
import { PraticienModifyComponent } from './components/praticiens/form/praticienModifyForm/praticienModify.component';

//* SERVICES
import { AppService } from './app.service';
import { RdvService } from './service/Rdv.service';
import { AlertService } from './service/Alert.service';
import { PatientService } from './service/Patient.service';
import { PraticienService } from './service/Praticien.service';

//* OTHERS
import { JwtInterceptor } from './JwtInterceptor/jwtInterceptor.component';

@NgModule({
  declarations: [
    AppComponent,
    RdvsComponent,
    LoginComponent,
    IndexComponent,
    AlertsComponent,
    MyAccountComponent,
    SearchBarComponent,
    PraticiensComponent,
    searchResultComponent,
    PraticienModifyComponent,
    RegisterPatientComponent,
    RegisterPraticienComponent,
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
    AlertService,
    PatientService,
    PraticienService,
    {provide: HTTP_INTERCEPTORS, useClass: JwtInterceptor, multi:true},
  ],
  bootstrap: [
    AppComponent
  ]
})
export class AppModule {}
