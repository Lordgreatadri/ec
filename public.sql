CREATE TABLE public.voter_request (
id SERIAL PRIMARY KEY,
msisdn character varying(255),
request character varying(255),
short_code character varying(255),
network character varying(255),
inserted_at timestamp(0) without time zone NULL DEFAULT NOW(),
updated_at timestamp(0) without time zone NULL DEFAULT NOW()
);

 


CREATE TABLE public.voter_response (
id SERIAL PRIMARY KEY,
first_name character varying(255),
last_name character varying(255),
voter_id character varying(255),
age character varying(255),
gender character varying(255),
polling_station_code character varying(255),
polling_station_name character varying(255),
district character varying(255),
region character varying(255),
status character varying(255),
msisdn character varying(255),
network character varying(255),
inserted_at timestamp(0) without time zone NULL DEFAULT NOW(),
updated_at timestamp(0) without time zone NULL DEFAULT NOW()
);



first_name,
last_name,
voter_id,
age,
gender,
polling_station_code,
polling_station_name,
district,
region,
status,
msisdn,
network)
VALUES(
''
'2020-09-30 09:46:00'

http://109.74.200.100/adri/contents/daily_contents_transmission.php

http://109.74.200.100/adri/contents/mass_contents_push.php


tigo cash 0277505736



CREATE TABLE public.contents (
id SERIAL PRIMARY KEY,
message character varying(255) NOT NULL,
service character varying(255),
keyword character varying(255),
scheduled_date timestamp(0) without time zone,
inserted_at timestamp(0) without time zone NULL DEFAULT NOW(),
updated_at timestamp(0) without time zone NULL DEFAULT NOW()
);


please all messages should now go through this API

http://api.mobilecontent.com.gh:8888/v1/sms/mt

{
"partner_id": "20201004",
"msisdn": "233544336599",
"service": "233012000003749",
"message": "Just testing boss",
"transaction": "22222222222"
}
this is for MTN messages



http://api.mobilecontent.com.gh:8888/v1/sms/mt

{
"partner_id": "50501005",
"msisdn": "0203224242",
"message": "Just testing boss",
"transaction": "22222222222"
}
this is for sending to Vodafone numbers

same endpoint

difference is the partner_id so take note 

POST service




<>MTN MOMO
https://uniwallet.docs.apiary.io/#reference/0/uniwallet-api's