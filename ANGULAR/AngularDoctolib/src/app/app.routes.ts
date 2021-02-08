import { NgModule } from '@angular/core';
import { RouterModule, Routes } from "@angular/router";
import { LoginComponent } from './components/login/login.component';
import { IndexComponent } from './components/index/index.component';
import { searchResultComponent } from './components/searchResult/searchResult.component';
import { RegisterPatientComponent } from './components/patients/form/registerPatient.component';
import { RegisterPraticienComponent } from './components/praticiens/form/registerPraticien.component';
import { MyAccountComponent } from './components/myAccount/myAccount.component';

const ROUTES:Routes = [
  {path : "registerPraticien", component : RegisterPraticienComponent},
  {path : "registerPatient", component : RegisterPatientComponent},
  {path : "search", component : searchResultComponent},
  {path : "account", component : MyAccountComponent},
  {path : "login", component : LoginComponent},
  {path : "", component : IndexComponent},
]

@NgModule({
  imports: [RouterModule.forRoot(ROUTES)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
