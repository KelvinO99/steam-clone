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

  //costruttore per il client HTTP
  constructor(public http: HttpClient) { }

  //get index dei giochi
  getGames(params : {}) {
    return this.http.get<any>(`${this.APIUrl}games/index`,{params});
  }

  //get della show del gioco
  showGame(id: number){
    return this.http.get<any>(`${this.APIUrl}games/show/${id}`);
  }

  //aggiornamento del gioco
  updateGame(id: number, updateDataGame: any) {
    return this.http.post<any>(`${this.APIUrl}games/update/${id}`, updateDataGame);
  }

  //aggiunta di un nuovo gioco
  storeGame(storedGameData: any) {
    return this.http.post<any>(`${this.APIUrl}games/store`, storedGameData);
  }

  deleteGame(id: number) {
    return this.http.delete<any>(`${this.APIUrl}games/destroy/${id}`);
  }

}


