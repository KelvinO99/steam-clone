import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

//Variabile per il richiamo dell'API
const URL: string = `${environment.api}`;

@Injectable({
  providedIn: 'root',
})
export class GameService {
  APIUrl = `${environment.api}/`;

  //Costruttore per il client HTTP
  constructor(public http: HttpClient) { }

  getGenres(params?: {}){
    return this.http.get<any>(`${URL}/tags/index`,{params})
  }
  getBestSellingGames(params : {}) {
    return this.http.get<any>(`${this.APIUrl}games/index`,{params});
  }

}

