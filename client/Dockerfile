FROM node:lts-alpine AS development
ADD . /home/node/app
WORKDIR /home/node/app
RUN ls -l /home/node/app
RUN yarn install

FROM development AS watch
CMD ["yarn", "watch"]

FROM development AS build
RUN yarn build
RUN sed -i 's#/build##' /home/node/app/public/index.html
RUN mv /home/node/app/public/images/favicon.*.ico /home/node/app/public/favicon.ico

FROM nginx:stable-alpine AS production
COPY --from=build /home/node/app/public/build /usr/share/nginx/html
COPY --from=build /home/node/app/public/index.html /usr/share/nginx/html/index.html
COPY ./docker/site.conf /etc/nginx/conf.d/default.conf
