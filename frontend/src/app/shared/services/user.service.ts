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

  constructor(public http: HttpClient) { }

  getUser(id: number) {
    return this.http.get<any>(`${this.APIUrl}users/show/${id}`);
  }

}


