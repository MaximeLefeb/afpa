import { NgModule } from '@angular/core';
import { AppComponent } from './app.component';
import { RouterModule, Routes } from "@angular/router";
import { IndexComponent } from './components/index/index.component';
import { searchResultComponent } from './components/searchResult/searchResult.component';
import { RegisterPatientComponent } from './components/patients/form/registerPatient.component';
import { RegisterPraticienComponent } from './components/praticiens/form/registerPraticien.component';

const ROUTES:Routes = [
  {path : "registerPraticien", component : RegisterPraticienComponent},
  {path : "registerPatient", component : RegisterPatientComponent},
  {path : "search", component : searchResultComponent},
  {path : "index", component : IndexComponent},
  {path : "", component : AppComponent},
]

@NgModule({
  imports: [RouterModule.forRoot(ROUTES)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
