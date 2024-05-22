import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class SystemRequirementsService {
  APIUrl = `${environment.api}/`;

  constructor(public http: HttpClient) { }

  getSystemRequirements(params : {}){
    return this.http.get<any>(`${this.APIUrl}system_requirements/index`,{params});
  }

  showSystemRequirements(id: number){
    return this.http.get<any>(`${this.APIUrl}system_requirements/show/${id}`);
  }

  updateSystemRequirements(params : {}){
    return this.http.put<any>(`${this.APIUrl}system_requirements/update`,{params});
  }

  storeSystemRequirements(params : {}){
    return this.http.post<any>(`${this.APIUrl}system_requirements/store`,{params});
  }
}
