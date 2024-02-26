import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';


//richiamo URL
@Injectable({
  providedIn: 'root'
})
export class GameService {
  APIUrl=`${environment.api}/`;

  constructor(private http: HttpClient) {}

  getUpdates(params?: {}){
    return this.http.get<any>(`${URL}`); 

  }
}
