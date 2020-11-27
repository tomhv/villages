FROM node:lts-alpine AS development
ADD . /home/node/app
WORKDIR /home/node/app
RUN ls -l /home/node/app
RUN yarn install

FROM development AS watch
CMD ["yarn", "watch"]

FROM development AS build
RUN yarn build
