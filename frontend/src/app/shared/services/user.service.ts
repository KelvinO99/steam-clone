import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class User {
  _id?: String;
  name?: String;
  email?: String;
  password?: String;
}
