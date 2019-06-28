import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PostListComponent } from './components/post-list/post-list.component';
import { PostSingleComponent } from './components/post-single/post-single.component';

const routes: Routes = [
  {
    path: '',
    component: PostListComponent
  },
  {
    path: 'posts/:id',   // because we're using a colon, 'id' will act like a variable for our component.
    component: PostSingleComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
