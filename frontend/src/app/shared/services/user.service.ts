import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

//Variabile per il richiamo dell'API
const URL: string = `${environment.api}`;

@Injectable({
  providedIn: 'root',
})
export class User {
  APIUrl = `${environment.api}/`;
  _id?: String;
  name?: String;
  email?: String;
  password?: String;

  //Costruttore per il client HTTP
  constructor(public http: HttpClient) { }

  getGames(params : {}) {
    return this.http.get<any>(`${this.APIUrl}games/index`,{params});
  }

  showGame(id: number){
    return this.http.get<any>(`${this.APIUrl}games/show/${id}`);
  }

/*   getUsers(params : {}) {
    return this.http.get<any>()
  } */


}


