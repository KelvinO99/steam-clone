import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class LanguageService {
  APIUrl = `${environment.api}/`;

  constructor(public http: HttpClient) { }

  getLanguages(params : {}){
    return this.http.get<any>(`${this.APIUrl}languages/index`,{params});
  }

  showGameLanguages(id: number){
    return this.http.get<any>(`${this.APIUrl}games_languages/show/${id}`);
  }

  updateLanguages(params : {}){
    return this.http.put<any>(`${this.APIUrl}languages/update`,{params});
  }

  storeLanguages(params : {}){
    return this.http.put<any>(`${this.APIUrl}languages/store`,{params});
  }
}
