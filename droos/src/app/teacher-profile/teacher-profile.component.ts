import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-teacher-profile',
  templateUrl: './teacher-profile.component.html',
  styleUrls: ['./teacher-profile.component.scss']
})
export class TeacherProfileComponent implements OnInit {
  
  constructor() { }
  clicked = false;

  boatData = [{
    name : "body",
    age:20,
  },
  {
    name : "lol",
    age:21,
  }
];
  ngOnInit() {
  }
  handleClick(){
    this.clicked = this.clicked==false?true:false;
  }
}
