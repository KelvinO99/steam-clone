import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class SystemRequirementsService {
  APIUrl = `${environment.api}/`;

  constructor(public http: HttpClient) { }

  showSystemRequirements(id: number){
    return this.http.get<any>(`${this.APIUrl}system_requirements/show/${id}`);
  }

  showSystemCharacteristics(id: number){
    return this.http.get<any>(`${this.APIUrl}system_characteristics/show/${id}`);
  }
}
