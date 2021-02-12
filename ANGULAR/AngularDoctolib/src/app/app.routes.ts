import { SetRdvComponent } from './components/rdvs/setRdv/setRdv.component';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from "@angular/router";
import { LoginComponent } from './components/login/login.component';
import { IndexComponent } from './components/index/index.component';
import { MyAccountComponent } from './components/myAccount/myAccount.component';
import { searchResultComponent } from './components/searchResult/searchResult.component';
import { RegisterPatientComponent } from './components/patients/form/registerPatient.component';
import { RegisterPraticienComponent } from './components/praticiens/form/registerPraticien.component';
import { ModifAccountComponent } from './components/myAccount/FormModifyMyAccount/modifAccount.component';
import { ListPraticiensComponent } from './components/praticiens/list/listPraticiens.component';

const ROUTES:Routes = [
  {path : "registerPraticien", component : RegisterPraticienComponent},
  {path : "registerPatient", component : RegisterPatientComponent},
  {path : "search", component : searchResultComponent},
  {path : "account", component : MyAccountComponent,
    children : [
      //TODO changer modif route vers account/modify
      {path : "modify", component : ModifAccountComponent}
    ]
  },
  {path : "listPraticiens", component : ListPraticiensComponent},
  {path : "modif", component : ModifAccountComponent},
  {path : "login", component : LoginComponent},
  {path : "setRdv", component : SetRdvComponent},
  {path : "", component : IndexComponent},
]

@NgModule({
  imports: [RouterModule.forRoot(ROUTES)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
