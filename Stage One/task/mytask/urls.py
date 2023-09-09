from django.urls import path
from . import views
from django.contrib import admin
from django.urls import path, include

urlpatterns = [
    path('get_info/', views.get_info, name='get_info'),
]