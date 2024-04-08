import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class TagService {
  APIUrl = `${environment.api}/`;

  //Costruttore per il client HTTP
  constructor(public http: HttpClient) { }

  getGenres(params?: {}){
    return this.http.get<any>(`${this.APIUrl}tags/index`,{params})
  }
}
