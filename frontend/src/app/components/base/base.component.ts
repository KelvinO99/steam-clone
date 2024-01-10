import { Injectable, Component, OnInit } from '@angular/core';

@Injectable()
export class BaseComponentDependences {
  constructor(
  ) { }
}

@Component({
  selector: 'app-base-component',
  templateUrl: './base.component.html',
  styleUrls: ['./base.component.scss'],
})

export class BaseComponent implements OnInit {
  regex = {
    name: "^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27\ s]?)+$",
    email: "[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}",
    password: "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@$!%*?&])[A-Za-z\\d@$!%*?&]{8,}$",
    phone: "^\\s*(?:\\+?(\\d{1,3}))?[-. (]*(\\d{3})[-. )]*(\\d{3})[-. ]*(\\d{3,4})(?: *x(\\d+))?\\s*$",
    mobile: "^([+]39)?\\s?((313)|(32[0123456789])|(33[013456789])|(35[0123456789])|(34[0123456789])|(36[0368])|(37[0123456789])|(38[0389])|(39[0123]))[\\s-]?([\\d]{7})$",
    vatNumber: "([0-9]{11})",
    fiscal_code: "^[a-zA-Z]{6}[0-9]{2}[abcdehlmprstABCDEHLMPRST]{1}[0-9]{2}([a-zA-Z]{1}[0-9]{3})[a-zA-Z]{1}$",
    url: "https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b([-a-zA-Z0-9()@:%_\\+.~#?&//=]*)",
    vatNumberFiscalCode: "^[a-zA-Z]{6}[0-9]{2}[abcdehlmprstABCDEHLMPRST]{1}[0-9]{2}([a-zA-Z]{1}[0-9]{3})[a-zA-Z]{1}$|([0-9]{11})"
  }

  currencyOptions = {
    align: "right",
    allowNegative: false,
    decimal: ",",
    precision: 2,
    prefix: "",
    thousands: "."
  };

  sevenCurrencyOptions = {
    align: "right",
    allowNegative: false,
    decimal: ",",
    precision: 7,
    prefix: "",
    thousands: "."
  };

  costs = [
    { name: 'Scegli...', value: null },
    { name: 'Standard', value: 'standard' },
    { name: 'Costo Medio Orario', value: 'average-hourly' },
    { name: 'Costo Effettivo', value: 'effective' }
  ];

  showValidatorsError(form: any, compiled = false) {
    Object.keys(form.controls).forEach(field => {
      const control = form.get(field);
      if ((compiled && control.value) || !compiled) control.markAsTouched({ onlySelf: true });
    });
  }

  optionsMap(options: any, label: string[], name: string[], value: string) {
    return options.map((option: any) => {
      let final_label = '';
      label.forEach(element => {
        final_label += option[element] + ' ';
      });

      let final_name = '';
      name.forEach(element => {
        final_name += option[element] + ' ';
      });

      return { label: final_label, name: final_name, value: option[value] }
    });
  }

  constructor() { }

  ngOnInit() {
  }

  getNestedKey(row: any, key: string) {
    let keys = key.split('.');
    let value = row;
    if (keys.length > 1) {
      keys.forEach((key) => {
        if (value[key] != undefined || value[key] != null) {
          value = value[key]
        }
      })
    } else {
      value = row[key];
    }
    return typeof (value) != 'object' ? value : null;
  }
}
