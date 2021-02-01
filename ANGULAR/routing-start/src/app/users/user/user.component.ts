import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params, Router } from '@angular/router';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {
  user: {id: number, name: string};

  constructor(private actiavedRoute: ActivatedRoute,
              private router: Router) { }

  ngOnInit() {
    // premier moyen pour récupérer les path params
    // const idUser = this.actiavedRoute.snapshot.params['idUser'];
    // const nameUser = this.actiavedRoute.snapshot.params['nameUser'];
    // this.user = {id: idUser, name: nameUser};

    this.actiavedRoute.params.subscribe((params: Params) => {
      this.user = {
        id: params['idUser'],
        name: params['nameUser']
      }
    })
  }

  onClick(id, name){
    this.router.navigate(['/users', id, name]);
  }

}
